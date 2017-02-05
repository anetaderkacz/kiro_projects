#!/usr/bin/perl -w
use Fcntl qw(:DEFAULT :flock);

require("./header.cgi");

print "Pragma: no-cache\n";
print "Content-type: text/html\n\n ";

sub gettotal {
    if (open (STAT, $monitor_file))	{
    sysopen(STAT,  $monitor_file, O_RDONLY)	or return -1;
        $ofh = select(STAT); $| = 1; select ($ofh);
        $total = <STAT>;

        if (defined($total) && $total ne "") { return $total; }
    }
    return -1;
}

sub getcurrent {
    my $dir = shift;
    $size = 0;

    opendir(DIR, $dir);
    @files = readdir(DIR);
    closedir(DIR);

    foreach $file (@files) {
        if (! -d $file) {
            $size += -s $dir."/".$file;
        }
    }

    return $size;
}

$total = gettotal();
$current = 0;
$current1 = getcurrent($tmp_dir_sid);
$current2 = getcurrent($upload_dir_sid);

if ($current1 == 0 && $current2 > 0) { $current = $total; }
elsif ($current1 == 0 && $current2 == 0 && $total > 0) { $current = 0; }
else {$current = $current1 + $current2; }

if ($current1 == 0 && $current2 > 0) { unlink($monitor_file); }

print "$current $total $status";
