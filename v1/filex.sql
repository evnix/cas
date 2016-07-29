select * from messages;



from username to username msg
1      user1      2   user2      helllo


select (select username from users where id=1) as sfromname ,
	(select username from users where id=2) as stoname,
	* from  messages  where rcvd=0
	
delete from messages