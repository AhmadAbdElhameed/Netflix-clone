<?php
    class SeasonProvider{
        private $con , $username;


        public function __construct($con,$username){

            $this->con = $con;
            $this->username = $username;
        }

        public function create($entity){

            $seasons = $entity->getSeasons();

            if(sizeof($seasons) == 0){
                return;
            }

            $seasonsHTML ="";
            foreach($seasons as $season){
                $seasonNumber = $season->getSeasonNumber() . "<br>";

                $videosHtml = "";

                foreach($season->getVideos() as $video){
                    $videosHtml .= $this->createVideoSquare($video);
                }
                $seasonsHTML .= "<div class='season'>
                                    <h3>Season $seasonNumber</h3>
                                    <div class='videos scrollbars_none'>
                                        $videosHtml
                                    </div>

                                </div>";
            }

            return $seasonsHTML;

        }

        private function createVideoSquare($video){
            $id = $video->getId();
            $title = $video->getTitle();
            $thumbnail = $video->getThumbnail();
            $description = $video->getDescription();
            $episodeNumber = $video->getEpisodeNumber();
            $hasSeen = $video->hasSeen($this->username) ? "<i class='fa-solid fa-circle-check seen'></i>" : "";
            return "<a href='watch.php?id=$id'>
                        <div class ='episodeContainer'>
                            <div class='contents'>
                                <img src='$thumbnail'>
                                <div class='videoInfo'>
                                    <h4>$episodeNumber. $title</h4>
                                    <span>$description</span>
                                </div>
                                $hasSeen
                            </div>
                        </div>
                    </a>";
        }



    }



?>