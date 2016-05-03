# itp405-final-project

Link to website feature video: https://www.youtube.com/watch?v=aNhkb9fYdOQ

Caching was used when a user entered the same filter options as a previous time, and also when viewing a track they had looked at before.

What is your site about?
* This site works as an type of addon to soundcloud that allows soundcloud users to discover new songs based off of their preferences. Users can search for music by genre, and then filter their results by a list of factors such as number of plays, upload date, artist, etc.  There is also a discover option which works like tinder, except for music.  The user picks a genre, and then is shown one song at a time. They can either like the song, therefor adding it to their like tracks, or skip it causing a new song to pop up. Users can then go to their profile page and view the tracks they have liked so far and add them to their actual soundcloud profile or create playlists of their liked songs.

What types of users will visit your site?
* Soundcloud users who are looking to find new music and want more filtering options than what the official soundcloud website provides

Will they need to create an account?
* Users will need to create an account in order to login. They can also link their soundcloud accounts to their profile for increased functionality such as adding their liked tracks to a soundcloud playlist.

What API will you be using?
* The Soundcloud API

What do you think your tables will be?
* Users table with a username and password, liked_songs table with a list of song IDs and the user ID who liked the song, and a playlists table which has a song ID and user ID.
