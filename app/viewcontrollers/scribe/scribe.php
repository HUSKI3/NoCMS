<?php

function build_navigation(){
  session_start();
  $current_id = $_SESSION['current']['id'];
  $profile_link = "/writer?id=".$current_id;
  return 
  <nav class="col-md-2 d-none d-md-block bg-dark sidebar">
    <div class="sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" href="/scribe">
            "Dashboard"
          </a>
        </li>
        .<li class="nav-item">
          <a class="nav-link" href=$profile_link>
            "Public Profile"
          </a>
        </li>
      </ul>
    </div>
  </nav>;
}

?>