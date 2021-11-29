<ul>
   <li><a href="default.asp">home</a></li>
   <li><a href="#project_link">projects</a></li>
   <li><a href="#contact_link">contact</a></li>
   <li><a href="http://my-first-local-site.local/wp-content/uploads/2021/11/Faizan-Bhagat-Official-Resume.pdf">resume</a></li>
</ul>

<div class="flex-container">
     <div class="main-pic">
        <img class = "image" src = "<?php echo get_theme_mod('main_image') ?>"  >
     </div>

     <div class="hero-text">
       <h2><?php echo get_theme_mod('hero_sentence') ?></h2>
       <p> </p>
     </div>
</div> 

<h1 class = 'divider-tab'>about me</h1>
<p class = 'biography'> <?php echo get_theme_mod('bio1_desc') ?> </p>
<p class = 'biography'> <?php echo get_theme_mod('bio2_desc') ?> </p>

<a id="project_link">
  <h1 class = 'divider-tab'>projects</h1>
</a>



<div class="projects-section">
 <?php
   $projects_data = get_projects_data('project_repeater_setting');
   if(!empty($projects_data)){
       foreach($projects_data as $k => $f){
        $project_img = '';
        if ($f['project_img']){
          $project_img = '<img class = "project-img" src = "'.esc_url( get_media_url( $f['project_img'] ) ). '">';
        }
 ?>
      <div class = "project-flex-container">
        <div class = "project-info-container">
              <div class = "project-title"><?php echo $f['project_title'] ?></div>
              <div class = "project-type"><?php echo $f['project_type'] ?></div>
              <div class = "project-language"><?php echo $f['project_language'] ?></div>
              <div class = "project-descr"><?php echo $f['project_descr'] ?></div>
        </div>
        <div><?php echo $project_img ?></div>
      </div>
   <?php
       }
   }
  ?>
</div>

<div class = 'contact-tag'>
  <a id="contact_link">
    <h4 class = 'contact-title'> CONTACT </h4>
  </a>
  <div class = 'logos'>
      <a href = https://www.instagram.com/faizanbhagat1>
      <img class = "contact-image" src = "<?php echo get_theme_mod('first_logo') ?>"  >
      </a>
      <a href = https://www.linkedin.com/in/faizanbhagat>
      <img class = "contact-image" src = "<?php echo get_theme_mod('second_logo') ?>"  >
      </a>
      <a href = mailto:faizanbhagat2003@gmail.com>
      <img class = "contact-image" src = "<?php echo get_theme_mod('third_logo') ?>"  >
      </a>
  </div>
</div>

<style>

body{
  background-color : white;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: white;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 1rem  1.5rem;
  text-decoration: none;
  color : black;
  font-size : 2rem;
  font-family : "verdana";
}

.flex-container{
 display : flex;
 flex-direction : row;
 justify-content : space-around;
 align-items : center;
 background-color : #e08080;
 padding-top : 2%;
 padding-bottom : 2%;
}

.main-pic {
 padding-left : 10%;
 width : 20%;
}
 
.hero-text {
 width : 32%;
 height : 25%;
 text-align : left;
 padding-right : 10%;
 padding-left : 1%;
 color : white;
 font-size : 3.2rem;
}

.image {
  width : 90%;
	border-radius: 50%;
}

.divider-tab{
 padding-top: 2rem;
 padding-left : 1rem;
 padding-bottom: .5rem;
 margin: 0;
 font-size : 3rem;
 font-weight : 300;
 text-decoration : underline;
 text-align : left;
 color : black;
 font-family : "verdana";
}

.biography{
  font-size : 1.7rem;
  padding-left : 1rem;
  font-family : "optima";
}
.project-title{
  font-size : 2.6rem;
  font-weight : 100;
}
.project-type{
  font-size : 2rem;
}
.project-language{
  font-size : 1.5rem;
}
.project-descr{
  font-size : 1.2rem;
}

.project-info-container{
  display : flex;
  padding-left : 1rem;
  flex-direction : column;
}

.project-flex-container{
  display : flex;
  flex-direction : row;
  align-items : center;
  justify-content : space-between;
  padding-bottom : 2%;
  font-family : "optima";
}

.contact-image{
  /*I used pixels here because I think icons should be the same size no matter the screen as they are universally recognized as that size*/
  width : 50px;
  padding-left : 1rem;
  padding-right : 1rem;
  padding-top : 0;
}

.project-img{
  width : 16rem;
  padding-left : 1rem;
}

.logos{
  display : flex;
  flex-direction : row;
  align-items : center;
  justify-content : center;
  padding-bottom : 1rem;
}

.contact-tag{
  background-color : #e08080;

}

.contact-title{
  padding-top : 1rem;
  margin-bottom : .8rem;
  font-size : 2rem;
  color : white;
  text-align : center;
}

@media only screen and (max-width: 1500px) {
  .hero-text{
    font-size : 2.5rem;
  }
}

@media only screen and (max-width: 1200px) {
  .image{
    width : 100%;
  }
}

@media only screen and (max-width: 1100px) {

.flex-container{
  flex-direction : column;
}

.main-pic {
 width : 90%;
 padding : 0rem;
 text-align : center;
}

.image{
  width : 40%;
}

.hero-text {
 width : 85%;
 height : 25%;
 text-align : left;
 padding-right : 1%;
 padding-left : 1%;
 color : white;
 font-size : 2.5rem;
}
}

@media only screen and (max-width: 600px) {
.hero-text {
 width : 90%;
 height : 25%;
 text-align : left;
 padding-right : 5%;
 padding-left : 5%;
 color : white;
 font-size : 1.5rem;
}

.project-flex-container{
  display : flex;
  flex-direction : column;
  align-items : center;
  justify-content : space-between;
  padding-bottom : 2%;
  font-family : "optima";
}

.main-pic {
 width : 90%;
 padding : 0rem;
 padding-top : 1rem;
 text-align : center;
}
}
</style>
