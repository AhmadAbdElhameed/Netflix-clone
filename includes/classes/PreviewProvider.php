<?php
    class PreviewProvider{

        private $con , $username;


        public function __construct($con,$username){

            $this->con = $con;
            $this->username = $username;
        }

        public function createTVshowPreviewVideo(){
            $entitiesArray = EntityProvider::getTVShowEntities($this->con, null , 1);

            if(sizeof($entitiesArray) == 0){
                ErrorMessage::show("No TV shows to display");
            }

            return $this->createPreviewVideo($entitiesArray[0]);
        }
        public function createMoviesPreviewVideo(){
            $entitiesArray = EntityProvider::getMoviesEntities($this->con, null , 1);

            if(sizeof($entitiesArray) == 0){
                ErrorMessage::show("No movies to display");
            }

            return $this->createPreviewVideo($entitiesArray[0]);
        }

        public function createPreviewVideo($entity){
            if ($entity == null) {
                $entity = $this->getRandomEntity();
            }
            $id = $entity->getId();
            $name = $entity->getName();
            $preview = $entity->getPreview();
            $thumbnail = $entity->getThumbnail();

            $videoId = VideoProvider::getEntityVideoForUser($this->con , $id,$this->username);
            $video = new Video($this->con , $videoId);
            $inProgress = $video->isInProgress($this->username);
            $playButtonText = $inProgress ? "Continue watching" : "Play";

            $seasonEpisode = $video->getSeasonAndEpisode();
            $subHeading = $video->isMovie() ? "" : "<h4>$seasonEpisode</h4>";

            return "<div class='previewContainer'>
                        <img src='$thumbnail' class='previewImage' hidden>
                        <video autoplay muted class='previewVideo' onended='previewEnded()'>
                            <source src='$preview' type='video/mp4'>
                        </video>
                        <div class='videoOverlay'>
                            <div class='mainDetails'>
                                <h3>$name</h3>
                                $subHeading
                                <div>
                                    <button onclick='watchVideo($videoId)'><i class='fa-solid fa-play'></i> $playButtonText</button>
                                    <button onclick='volumeToggle(this)'><i class='fa-solid fa-volume-xmark'></i></button>
                                </div>
                            </div>
                        </div>
                    </div>";
        }

        public function createEntityPreviewSquare($entity){
            $id = $entity->getId();
            $name = $entity->getName();
            $thumbnail = $entity->getThumbnail();

            return "<a href='entity.php?id=$id'>
                        <div class= 'previewContainer small'>
                            <img src='$thumbnail' title='$name'>
                        </div>
                    </a>";
        }

        public function getRandomEntity(){
            // $query = $this->con->prepare("SELECT * FROM entities ORDER BY RAND() LIMIT 1");
            // $query->execute();
            // // get the data and store it in associtive array
            // $row = $query->fetch(PDO::FETCH_ASSOC);

            // return new Entity($this->con,$row);

            $entity = EntityProvider::getEntities($this->con , null , 1);
            return $entity[0];


        }
    }

?>