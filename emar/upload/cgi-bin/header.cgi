#!/usr/bin/perl

$|=1;	#unbuffers streams

@qstring = split(/&/,$ENV{'QUERY_STRING'});

@p1 = split(/=/,$qstring[0]);
$sid = $p1[1];
$sid =~ s/[^a-zA-Z0-9]//g; 

@p2 = split(/=/,$qstring[1]);
$status = $p2[1];
$status =~ s/[^a-zA-Z0-9]//g; 


$tmp_dir = "/public_ftp/incoming";
$upload_dir = "/public_ftp/incoming";

$tmp_dir_sid = "$tmp_dir/$sid"."_tmp";
$upload_dir_sid = "$upload_dir/$sid";
$monitor_file = "$tmp_dir_sid"."_params";
$summary_file = "$upload_dir_sid"."/summary.xml";

$max_upload = 5*1024*1024*1024;

sub bye_bye {
    $mes = shift;
    close (STDIN);
    print "<br>$mes<br>\n";
    exit;
}

sub draw {
    my $file = shift;
    my $content = shift;
    if (-e "$file") { unlink("$file"); }
    sysopen(FH, $file, O_RDWR | O_CREAT) or bye_bye("can't open numfile: $!");
    $ofh = select(FH); $| = 1; select ($ofh);
    flock(FH, LOCK_EX) or bye_bye("can't write-lock numfile: $!");
    seek(FH, 0, 0) or bye_bye("can't rewind numfile : $!");
    print FH $content;
    close(FH);
}

1;
