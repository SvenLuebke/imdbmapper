#!/usr/bin/env perl

use utf8;
use strict;
use warnings;
use Term::ANSIColor;

my $path= "imdb" ;
my $pathIMDB = '/tmp/imdb';
my $pathTMP = '/tmp/imdb';

binmode (STDERR,"encoding(utf8)");

my $thread = qx{ps ax};


sub progress_split {
      my $thread = qx{ps ax};
      if ($thread =~ /\/usr\/bin\/xml_split/)  {
            sleep(2);
            my $info = qx{ls $pathIMDB/ |grep -o workfile- |uniq -c |sed 's/[^0-9]*//g'};
            my $multiply = 2;
            my $statesplit = $info * $multiply;
            system "$pathTMP/status.sh destroy_scroll_area";
            system "$pathTMP/status.sh setup_scroll_area";
            system "$pathTMP/status.sh 'draw_progress_bar $statesplit' ";
            progress_split();
      }
}

if ($thread =~ /\/usr\/bin\/xml_split/)  {
      progress_split();
}


sleep(1);

my $waitForProcessName = "imdb\/worker";

sub progress_imdb {
      my $thread = qx{ps ax};
      if ($thread=~ m/$waitForProcessName/)  {
            #print "$0: progress_imdb()";
            sleep(5);
            my $info = qx{ls $pathIMDB/ |grep -o mappedfile- |uniq -c |sed 's/[^0-9]*//g'};
            my $multiply = 2;
            my $statemapped = $info * $multiply;
            system "$pathTMP/status.sh destroy_scroll_area";
            system "$pathTMP/status.sh setup_scroll_area";
            system "$pathTMP/status.sh 'draw_progress_bar $statemapped' ";
            progress_imdb();
      }
}

if ($thread=~ m/$waitForProcessName/)  {
      progress_imdb();
}



exit;

