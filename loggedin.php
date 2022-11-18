    <nav>
        <ul>
            <li><a class="nav-button" HREF="#home-container">HOME</a></li>
            <li><a class="nav-button" HREF="#aboutMe-container">ABOUT ME</a></li>
            <li><a class="nav-button" HREF="#projects-container">PROJECTS</a></li>
            <li><a class="nav-button" HREF="#goals-container">GOALS</a></li>
            <button id="logout" type="button" class="nav-button" data-toggle="modal" data-target="#logoutModal">LOGOUT</button>
            <button id="userButton" type="button" class="nav-button" data-toggle="modal" data-target="#userModal">
                <?php echo $_SESSION['loggedIn'] ?>
            </button>
        </ul>   
    </nav>
    <div class="container-socials">
        <section>
            <div class="icon-list">
                <div class="icon-item">
                    <a href="https://www.instagram.com/samuel_10.12_/" target="_blank" class="icon-link"><i class="fab fa-instagram"></i></a>
                </div>
                <div class="icon-item">
                    
                    <a href="https://github.com/Saph0000" target="_blank" class="icon-link"><i class="fab fa-github"></i></a>
                </div>
                <div class="icon-item">
                    <a href="https://youtube.com" target="_blank" class="icon-link"><i class="fab fa-youtube"></i></a>
                </div>
                <div class="icon-item">
                    <a href="https://www.linkedin.com/in/samuel-reutimann-55a020252/" target="_blank" class="icon-link"><i class="fab fa-linkedin"></i></a>
                </div>    
            </div>
        </section>
    </div>   
    <div class="grid-container">
        <div></div>    
        <div class="home-container" id="home-container">
            <div class="postIt post">
                <p>Hello my Name is Samuel, I am 16 years old and I am currently a apprentice as a software developer.</p>
            </div>
            <div>
                <img id="images"src="pictures/samuel_glass.jpg">
            </div>
        </div>    
        <div></div><div></div>    
        <!-- container 2 -->
        <div class="aboutMe-container" id="aboutMe-container">
            <div class="postIt post">
                <h1>ABOUT ME</h1>
                <p>Here you can see a few things I like!</p>
            </div>
            <div class="gallery">
                <?php 
                    $sql = "SELECT * FROM Samuel.dbo.PictureGallery WHERE userId='" . $_SESSION['userId'] . "';";
                    $resultset = $connection->executeQuery($sql);
                    while( $result = $resultset->getNextRow()) {
                        $id = $result['id'];
                        $xPos = $result['xPos'];
                        $yPos = $result['yPos'];
                        $description = $result['description'];
                        $pictureSrc = $result['pictureSrc'];
                        $height = $result['height'];
                        $zindex = $result['zindex'];
                        ?>
                        <div class="gallery-div" picture-id="<?php echo $id ?>" id="picture<?php echo $id ?>"style="top: <?php echo $yPos ?>px; left: <?php echo $xPos ?>px; z-index: <?php echo ($zindex > 0) ? ($zindex):(0) ?>; height: <?php echo $height ?>px;">
                            <img  class="gallery-pictures" src="<?php echo $pictureSrc ?>">
                        </div>

                <?php }
                ?>
            </div>
        </div>    
        <div></div>
        <!-- container 3 -->
        <div class="projects-container" id="projects-container">
            <div class="postItTitle">
                <p>These are some of my Projects</p>
            </div>
            <div class="project-table">
                <table id="data-table" class="styled-table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Description
                            <button id="rowButton" type="button" class="rowButton" data-toggle="modal" data-target="#rowModal">ADD ROW</button>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //getting table from sql server and user tabledit to edit it
                        $sql_query = "SELECT id, name, creationDate, endDate, description FROM Samuel.dbo.projects";
                        $resultset = $connection->executeQuery($sql_query);
                        while( $Names = $resultset->getNextRow()) {
                        ?>
                            <tr id="<?php echo $Names ['id']; ?>">
                                <td><?php echo $Names ['id']; ?></td>
                                <td><?php echo $Names ['name']; ?></td>
                                <td><?php echo $Names ['creationDate']->format('d.m.Y'); ?></td>
                                <td><?php echo $Names ['endDate']->format('d.m.Y'); ?></td>
                                <td><?php echo $Names ['description']; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                </table>
            </div>
          </div>    
        <div></div>
        <!-- container 4 -->
        <div class="goals-container" id="goals-container">

        <?php 
            $sql_query = "SELECT id, xPos, yPos, goal FROM Samuel.dbo.goalGallery WHERE userId = '" . $_SESSION['userId'] . "'";
            $resultset = $connection->executeQuery($sql_query);
            while( $goal = $resultset->getNextRow()) {
                $id = 'goal' . $goal['id'];
                $idCode = $goal['id'];
        ?>
            <div class="draggable" goal-id="<?php echo $idCode?>" id="<?php echo $id?>" style="left: <?php echo $goal['xPos']?>px; top: <?php echo $goal['yPos']?>px">
                <div class="post">
                    <p>
                        <?php echo $goal ['goal'] ?>
                    </p>
                </div>
            </div>
            <div id="rcMenu<?php echo $idCode?>"class="dropdown clearfix rcMenu">
                <button class="noselect delButton" sql-id="<?php echo $idCode ?>" id="delButton<?php echo $idCode?>"><span class='text'>Delete</span><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg></span></button>
            </div>
        <?php } ?>

        <div class="draggable addGoal" style="left: 1780px; top: 850px">
            <div>
                <input type="text" id="goalsInput">
            </div>
            <div>
                <button class="nav-button" id="addGoalButton" data-target="#goalModal" data-toggle="modal">ADD</button>
            </div>
        </div>
        
    </div>

            </div>