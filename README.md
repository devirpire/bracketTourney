Do create these tables in SQL for the code to work:<br>
<b>GTadmins</b> with fields: "id (PRIMARY KEY), email, password"<br> 
<b>GTusers</b> with fields: "userID (PRIMARY KEY), un, email, level, password, banned"<br>
<b>GTmatches</b> with fields: (both matchID and user1 should be composite keys): "matchID, user1, win"

- id, userID, level, matchID, user1 should be set as INTEGER
- un, email, password should be set as VARCHAR/STRING
- win should be set as TINYINT with a max value of 1
