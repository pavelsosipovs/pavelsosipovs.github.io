#!/bin/bash
find -name "*.png" | while read f; do pngnq -n 25 -s 10 -f $f; done


