#!/usr/bin/env perl

use utf8;
use strict;
use warnings;
use Term::ANSIColor;

binmode (STDERR,"encoding(utf8)");

my $path= "imdb" ;
my $xml_temp= "/tmp/imdb/";

my $thread ="";
$thread = qx{ps ax};


sub generateQxString($ $)
{
  my( $tmpLoopStart, $tmpLoopEnd ) = @_;
  my $qxString;
  my $outputString;

  $outputString = "Reading XML Part ";
  my $instanceIndex = 0;
  for (my $loop = $tmpLoopStart; $loop < $tmpLoopEnd; $loop++)
  {
    my $tmpIndex = sprintf("%02d", $loop);
    $instanceIndex++;
    $qxString .= "$path/imdbtask.pl $instanceIndex ${xml_temp}workfile-${tmpIndex}.xml > ${xml_temp}mappedfile-${tmpIndex}.xml & ";
    $outputString .= $tmpIndex . " ";
  }
  $outputString .= "Together for faster ImdB Download\n";
  print STDERR $outputString;
  return $qxString;
}

sub startThreadsForPart($ $)
{
  my( $tmpLoopStart, $tmpLoopEnd ) = @_;


  for (my $loop = $tmpLoopStart; $loop > $tmpLoopEnd; $loop--)
  {
    my $tmpIndex = sprintf("%02d", $loop);
    if ( -e "$xml_temp/workfile-${tmpIndex}.xml")
    {
        qx( @{[ main::generateQxString($tmpLoopEnd+1, $loop+1) ]} );
        last;
    }
  }
}

sub wait_for_thread {
    my $thread = qx{ps ax};
    if ($thread=~ m/imdbtask/)  {
        sleep(4);
        wait_for_thread();
    }
}

startThreadsForPart(28, 24);

wait;
wait_for_thread();

startThreadsForPart(32, 28);

wait_for_thread();

startThreadsForPart(36, 32);

wait_for_thread();

startThreadsForPart(40, 36);

wait_for_thread();

startThreadsForPart(44, 40);

wait_for_thread();

startThreadsForPart(48, 44);

wait_for_thread();

startThreadsForPart(52, 48);

wait_for_thread();
wait;


1;
exit;

