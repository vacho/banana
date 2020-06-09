jQuery(document).ready(function($) {
  $(".node--type-programa h2:contains('Link Android')").addClass("android-icon");
  $(".node--type-programa h2:contains('Link IPhone')").addClass("iphone-icon");
  $(".node--type-programa h2:contains('Link Windows')").addClass("windows-icon");
  $(".node--type-programa h2:contains('Link Windows 32')").addClass("windows-32-icon");
  $(".node--type-programa h2:contains('Link Windows 64')").addClass("windows-64-icon");
  $(".node--type-programa h2:contains('Link Mac')").addClass("mac-icon");
  $(".node--type-programa h2:contains('Link Linux')").addClass("linux-icon");
  $(".node--type-programa div:has('> a.colorbox')").addClass("image-container");

  var empty1 = $(".node--type-programa .block-field-blocknodeprogramafield-software-libre div:empty");
  empty1.parent().remove();
  var empty2 = $(".node--type-programa .block-field-blocknodeprogramafield-gratis div:empty");
  empty2.parent().remove();
  var empty3 = $(".node--type-programa .block-field-blocknodeprogramafield-demo div:empty");
  empty3.parent().remove();
  var empty4 = $(".node--type-programa .block-field-blocknodeprogramafield-online div:empty");
  empty4.parent().remove();
  var empty5 = $(".node--type-programa .block-field-blocknodeprogramafield-de-prueba div:empty");
  empty5.parent().remove();

});
