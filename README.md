# Open-eClass-BatchBackup
A script to backup all the courses from the [Open eClass e-learning Platform](http://www.openeclass.org/)

#How to Install
You have to copy the script file to the root directory of the Open eClass platform.  

#How to Run
Run the follow command from shell (terminal) 

`[root@eclass-stage openeclass]# php batch_archive_course.php` 

#Results
The script generates a zip file per course and saves under the `courses/backups/` directory

> Backup 0001/1344 ==> 6:EE103... Done
>
> Backup 0002/1344 ==> 10:MH100... Done
>
> Backup 0003/1344 ==> 13:ET102... Done
>
> Backup 0004/1344 ==> 14:ET103... Done
>
> Backup 0005/1344 ==> 16:CS100... Done
>
> Backup 0006/1344 ==> 18:ET104... Done