jQuery(document).ready(function($) {
  $(".node--type-programa h2:contains('Link Android')").addClass("android-icon");
  $(".node--type-programa h2:contains('Link IPhone')").addClass("iphone-icon");
  $(".node--type-programa h2:contains('Link Windows')").addClass("windows-icon");
  $(".node--type-programa h2:contains('Link Windows 32')").addClass("windows-32-icon");
  $(".node--type-programa h2:contains('Link Windows 64')").addClass("windows-64-icon");
  $(".node--type-programa h2:contains('Link Mac')").addClass("mac-icon");
  $(".node--type-programa h2:contains('Link Linux')").addClass("linux-icon");
  $(".node--type-programa div:has('> a.colorbox')").addClass("image-container");
});
