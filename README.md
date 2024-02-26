# NORSU-ELCMS
- has for 5 types of accounts: 
    - STUDENT
    - INSTRUCTOR / TEACHER
    - DEPT HEAD
    - COLLEGE DEAN
    - ADMIN
- contains content management where users are allowed to post anything they wanted like FACEBOOK.
- chat system - communicates with the fellow users may it be the fellow students, teacher, dept head or college deans
- class system - students enter in the code given by teachers like the EDMODO and some EDMODO functionalities where students can take exam and be graded by the instructor.

### HOW TO USE
- to change the variable names like dbName, dbUser, dbPassword it can be located at - @/app/config/dbVariables.php 

<br />

`Default Variables`
- dbName: norsu-elcms
- dbUser: root
- dbPassword: 

<br />

`Default Accounts`

| ACCOUNT | USERNAME | PASSWORD |
|----------|----------|----------|
| ADMIN | RegisterAdmin | RegisterAdmin|
| College Dean | RegisterCollegeDean | RegisterCollegeDean |
| DeptHead | RegisterDeptHead | RegisterDeptHead |
| Instructor | RegisterInstructor | RegisterInstructor |
| Student | RegisterStudent | RegisterStudent |


----
### REQUIREMENTS


```bash 
mysql 5.6.51  -  (above version errors will occur)
php 8.1  -  (working)
```