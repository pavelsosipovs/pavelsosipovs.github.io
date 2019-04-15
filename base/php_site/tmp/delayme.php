<?php

//500000000 == 1/2sec
if (time_nanosleep(0, 5000000) === true) {
    echo 'Ahoy!';
}

