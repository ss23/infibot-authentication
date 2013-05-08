Some scripts + files for running an Infibot alternative auth server.

TODO
====

* Get VIP so we can replicate that

Setup
=====

Edit your hosts file to point infibot.com to a webserver serving these files.
I'll probably run one on infi.ss23.geek.nz soon for public testing, if people like.
You could use a transparent proxy or similiar if you find it more appropriate to intercept requests like that.

Protocol
========

On startup, the client will check version.txt to see if the client is up to date. I presume it will download dependencies if required there.
When doing auth, it'll make a GET request to login.php. The user parameter set to the username. The password parameter set to md5(the password). The User Agent is set to base64(reverse(base64(md5(password)))) (where reverse is the reverse of the ascii string. abc -> cba).
Failing to give a matching UA and password parameter will result in a 404.
The obvious security implications of "Oh, we'll write some obfuscation instead of using SSL like sane people" are clear (also rofl @ using md5).
There is likely more issues here with PHP's == comparison doing type coercion.
