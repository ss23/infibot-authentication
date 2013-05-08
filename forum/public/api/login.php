<?php

// base64(reverse(base64('ID:TYPE:accepted')))
echo base64_encode(strrev(base64_encode('1:Member:accepted')));

