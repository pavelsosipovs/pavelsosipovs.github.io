mkdir thumbs
find -name "*.jpeg" | while read f; do gm -convert -scale 150 $f thumbs/$f; done
