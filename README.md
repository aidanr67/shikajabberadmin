# shikajabberadmin
php admin site for prosody jabber server using mySQL storage

This site is designed for a specific community jabber server. Therefore the server name (shikajabber.lan) is hard coded into all JID's. I may change this later if needed.

This site required that the prosody storage be set to "external" -> mySQL database. 
I have written code for "internal" but it gets a bit messy and using a database is just way easier.

In addition you need to add a column to the prosody table in your DB called administrator with values 0 (not administrator) or 1 (administrator) and set your admin account to 1. I may change this to keep setups cleaner, just haven't thought of a better solution yet.
