#!/bin/bash
find -name "*.png" | while read f; do pngnq -n 50 -s 10 -f $f; done


