#!/bin/bash
# Converts .FLV file into MP4, WEBM and OGV for using in HTML5 players
# Use flv file WITHOUT EXTENSION as first param. 
# Example:    "sh convert.sh Tips_samlet"  --> will create 3 extra files from one Tips_samlet.flv

ffmpeg -i $1.flv -qscale 3 $1.mp4;ffmpeg2theora -o $1.ogv $1.mp4;ffmpeg -i $1.mp4 -acodec libvorbis -ac 2 -ar 44100 -ab 96k -b 1024k $1.webm

