#!/bin/bash
find -name "*.png" | while read f; do pngnq -n 150 -s 10 -f $f; done


