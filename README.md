<h1 align="center">Movies System</h1>
<p align="center">Web program for storing movie information</p>
<hr />

<h1>Installation</h1>

<h3>Step 1:  Install the Dependencies</h3>
<p>Install the <a href="https://docs.docker.com/engine/install/ubuntu/">Docker for Linux</a> or <a href="https://docs.docker.com/desktop/install/windows-install/">Docker for Windows</a> and <a href="https://docs.docker.com/compose/install/">Docker Compose</a></p>

<h3>Step 2: Get Project</h3>
<p>Сreate a directory where you want to use this Docker project.</p>
<p>Go to the created folder and clone the repository.</p>

<h3>Step 3: Change Docker config.</h3>
<p>Change the docker-compose / dockerfile (update network name, ports, etc)</p>

<h3>Step 4: Start Docker</h3>
<p>Run <b>docker-compose up -d --build</b></p>

<h3>Step 5: Database settings</h3>
<p>Create a database and import data from a file "movies.sql"</p>
<p>Open "conf/db.php" in project and change the value for the database connection:</p>
<p>In "DB_HOST" set your hostname;</p>
<p>In "DB_USER" set the database username;</p>
<p>In "DB_PASS" set your password;</p>
<p>In "DB_NAME" set name of the database.</p>

<h3>Step 6: Project settings</h3>
<p>Open "conf/setting.php" and in variable $siteName set the site link</p>