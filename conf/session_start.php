<?php

  // enforcing session cookie
  @ini_set("session.cookie_httponly", 1); // XSS resistance
  @ini_set("session.cookie_samesite", "Strict"); // CSRF resistance
  session_name("Landing-page-session"); // say hello at humanize.me if you like my code
  session_start(); // now we initiate the session

 