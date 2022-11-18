     <nav>
        <ul>
            <li><a class="nav-button" href="#home-container">HOME</a></li>
            <li><a class="nav-button" HREF="#aboutMe-container">ABOUT ME</a></li>
            <li><a class="nav-button" HREF="#projects-container">PROJECTS</a></li>
            <li><a class="nav-button" HREF="#goals-container">GOALS</a></li>
            <button id="login" type="button" class="nav-button" data-toggle="modal" data-target="#myModal">LOGIN</button> 
            <button id="register" type="button" class="nav-button" data-toggle="modal" data-target="#registerModal">Register</button> 
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
                <img src="pictures/samuel_glass.jpg">
            </div>
        </div>    
        <div></div><div></div>    
        <div class="aboutMe-container" id="aboutMe-container">
            <div class="postIt post">
                <div>
                    <h1>ABOUT ME</h1>
                </div>
                <p>Here you can see a few things I like!</p>
            </div>
            <div class="gallery">
            <?php 
                    $sql = "SELECT * FROM Samuel.dbo.PictureGallery WHERE userId='7';";
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
                        <div class="gallery-div" picture-id="<?php echo $id ?>" id="picture<?php echo $id ?>"style="top: <?php echo $yPos ?>px; left: <?php echo $xPos ?>px; z-index: <?php echo ($zindex > 0) ? ($zindex):(0) ?>; height: <?php echo $height ?>px">
                            <img  class="gallery-pictures" src="<?php echo $pictureSrc ?>">
                        </div>
                <?php }
                ?>
            </div>
        </div>    
        <div></div>
        <div class="projects-container" id="projects-container">
            <div class="postItTitle">
                <p>These are some of my Projects</p>
            </div>
            <div class="project-table">
                <table  class="styled-table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // getting the table from sql server
                        $sql_query = "SELECT id, name, creationDate, endDate, description FROM Samuel.dbo.projects";
                        $resultset = $connection->executeQuery($sql_query);
                        while( $Names = $resultset->getNextRow()) { ?>
                                <tr>
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
    define("DEFAULT_USER_ID", 7);
    $sql_query = "SELECT id, xPos, yPos, goal FROM Samuel.dbo.goalGallery WHERE userId = '7'";
    $resultset = $connection->executeQuery($sql_query);
    while( $goal = $resultset->getNextRow()) {
        $id = 'goal' . $goal['id'];
    ?>

    <div class="goal" id="<?php echo $id?>" style="left: <?php echo $goal['xPos']?>px; top: <?php echo $goal['yPos']?>px">
        <div class="post">
            <p>
                <?php echo $goal ['goal'] ?>
            </p>
        </div>
    </div>
    
<?php } ?>
</div>
    </div>