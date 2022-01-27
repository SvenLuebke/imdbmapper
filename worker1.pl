#!/usr/bin/env perl

use utf8;
use strict;
use warnings;

use threads;
use Term::ANSIColor;
use Time::HiRes qw(usleep nanosleep);

binmode (STDERR,"encoding(utf8)");

my $numberOfParts = 49;
my $threadMaxNumber = 6;

my $path= "imdb" ;

my $xml_temp= $ENV{'PATH_TMP_IMDB'};

my $thread ="";
$thread = qx{ps ax};

my @threads;

#my ($input, $output) = @ARGV;
print "DBG # ".__LINE__."$0 : started\n";

sub threadImdbTask($)
{
  my( $tmpIndex) = @_;
  my $strIndex = sprintf("%02d", $tmpIndex);

  if ( -e "$xml_temp/workfile-${strIndex}.xml")
  {
    print STDERR "Reading XML Part : $strIndex";
    qx{perl $path/imdbtask.pl ${strIndex} ${xml_temp}/workfile-${strIndex}.xml > ${xml_temp}/mappedfile-${strIndex}.xml};
  }
}

# set the array to max number
$#threads = $threadMaxNumber;
my $threadIndex = 1;
my $threadLimitCounter = 0;

while (($threadIndex <= $numberOfParts) || ($threadLimitCounter > 0))
{
  foreach ( @threads ) {
    # look for free space in array for new threads
    if (not defined $_) {
      if ($threadIndex <= $numberOfParts) {
        my $thr = threads->create(\&threadImdbTask, $threadIndex);
        print "found free! Size is $#threads\n";
        $_ = $thr;
        #print "Active threads: " . threads->list() . "\n";
        $threadLimitCounter++;
        $threadIndex++;
      }
    }
    else {
      if ($_->is_joinable())
      {
    	  print "Found joinable thread. $threadLimitCounter $threadIndex\n";
        $_->join();
        $threadLimitCounter--;
        $_ = undef;
      }
    }
  }
  sleep(1);
}

print "$0 : ".__LINE__."\n";
# just to be sure: wait for all processes
#wait;

print "$0: end()";

1;
exit;

