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

  $("[class*='-es-descargar-programas-gratis-de-ciencias-sociales-y-humanidades']").addClass("-es-descargar-programas-gratis-de-ciencias-sociales-y-humanidades");
  $("[class*='-en-download-free-software-social-sciences-and-humanities']").addClass("-en-download-free-software-social-sciences-and-humanities");

  $("[class*='-es-descargar-programas-gratis-de-docencia-y-pedagogia']").addClass("-es-descargar-programas-gratis-de-docencia-y-pedagogia");
  $("[class*='-en-download-free-software-teaching-and-pedagogy']").addClass("-en-download-free-software-teaching-and-pedagogy");

  $("[class*='-es-descargar-programas-gratis-de-gestion-finanzas-ventas']").addClass("-es-descargar-programas-gratis-de-gestion-finanzas-ventas");
  $("[class*='-en-download-free-software-management-finances-sales']").addClass("-en-download-free-software-management-finances-sales");

  $("[class*='-es-descargar-programas-gratis-de-arte-y-multimedia']").addClass("-es-descargar-programas-gratis-de-arte-y-multimedia");
  $("[class*='-en-download-free-software-art-and-multimedia']").addClass("-en-download-free-software-art-and-multimedia");

  $("[class*='-es-descargar-programas-gratis-de-ciencias-naturales']").addClass("-es-descargar-programas-gratis-de-ciencias-naturales");
  $("[class*='-en-download-free-software-natural-science']").addClass("-en-download-free-software-natural-science");

  $("[class*='-es-descargar-programas-gratis-de-ingenieria-y-arquitectura']").addClass("-es-descargar-programas-gratis-de-ingenieria-y-arquitectura");
  $("[class*='-en-download-free-software-engineering-architecture']").addClass("-en-download-free-software-engineering-architecture");

  $("[class*='-es-descargar-programas-gratis-de-ciencias-medicas-y-salud']").addClass("-es-descargar-programas-gratis-de-ciencias-medicas-y-salud");
  $("[class*='-en-download-free-software-medicine-and-health']").addClass("-en-download-free-software-medicine-and-health");

  $("[class*='-es-descargar-programas-gratis-de-informatica-y-telecomunicaciones']").addClass("-es-descargar-programas-gratis-de-informatica-y-telecomunicaciones");
  $("[class*='-en-download-free-software-computer-and-telecommunications']").addClass("-en-download-free-software-computer-and-telecommunications");

  $("[class*='-es-descargar-programas-gratis-de-otras-profesiones']").addClass("-es-descargar-programas-gratis-de-otras-profesiones");
  $("[class*='-en-download-free-software-another-crafts']").addClass("-en-download-free-software-another-crafts");

  $("[class*='-es-descargar-programas-gratis-de-fisica-matematicas-y-astronomia']").addClass("-es-descargar-programas-gratis-de-fisica-matematicas-y-astronomia");
  $("[class*='-en-download-free-software-physical-mathematical-astronomy']").addClass("-en-download-free-software-physical-mathematical-astronomy");
});
