#!/usr/bin/perl -w

use Fcntl qw(:DEFAULT :flock);
use File::Temp qw/ tempfile tempdir /;
use File::Path qw/ rmtree /;
use CGI;

require("./header.cgi");

$content_type = $ENV{'CONTENT_TYPE'};
$len = $ENV{'CONTENT_LENGTH'};

$|=1;

print "Content-type: text/html\n\n";

if ($len > $max_upload) { bye_bye("The maximum upload size ($max_upload) has been exceeded!"); }
if (-e $monitor_file) { bye_bye("Invalid or already used session!"); }

draw($monitor_file, $len);

deldir($tmp_dir_sid);
deldir($upload_dir_sid);

if ($TempFile::TMPDIRECTORY){ $TempFile::TMPDIRECTORY = $tmp_dir_sid; }
elsif($CGITempFile::TMPDIRECTORY) {$CGITempFile::TMPDIRECTORY = $tmp_dir_sid;}
else{ bye_bye("<font color='red'>ERROR</font>: Failed to assign CGI temp directory!"); }

createdir($tmp_dir_sid);
createdir($upload_dir_sid);

my $cg = new CGI();
my $qstring = "";
my %vars = $cg->Vars;
my $j=0;
my $summary = "";

$summary .= "<summary>\n";
while (($key,$value) = each %vars) {
    my $file_upload = $cg->param($key);
    if (defined $value && $value ne '') {
        my $fh = $cg->upload($key);
        if (defined $fh) {
            my $fsize =(-s $fh);
            my $tmp_filename = $cg->tmpFileName($fh);
            $fh =~ s/([^a-zA-Z0-9_\-.])/uc sprintf("%%%02x",ord($1))/eg;
            close($fh);
            $upload_filename = "$upload_dir_sid"."/"."$j";
            rename($tmp_filename, $upload_filename) or bye_bye("Cannot rename from $tmp_filename to $upload_filename: $!");
            $summary .= "\t<file>\n";
            $summary .= "\t\t<name>$fh</name>\n";
            $summary .= "\t\t<length>$fsize</length>\n";
            $summary .= "\t\t<location>$upload_filename</location>\n";
            $summary .= "\t</file>\n";
            $j++;
        } else {
            $value =~ s/([^a-zA-Z0-9_\-.])/uc sprintf("%%%02x",ord($1))/eg;
            $summary .= "\t<key>\n";
            $summary .= "\t\t <name>$key</name>\n";
            $summary .= "\t\t <value>$value</value>\n";
            $summary .= "\t</key>\n";
        }
    }
}
$summary .= "</summary>\n";

draw($summary_file, $summary);
#print $summary;

deldir($tmp_dir_sid);

sub createdir {
    my $dir = shift;
    if (-d $dir) { deldir($dir);	}
    mkdir($dir, 0777) or bye_bye("<font color='red'>ERROR</font>: Failed to mkdir $dir: $!");
}

sub deldir {
    my $dir = shift;
    if (-d $dir) { rmtree($dir); }
}
