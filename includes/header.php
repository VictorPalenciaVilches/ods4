<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Plataforma educativa ODS 4 - Educación de Calidad">
    <title><?php echo isset($page_title) ? $page_title . ' - ODS 4' : 'ODS 4 - Educación de Calidad'; ?></title>
    
    <?php if (isset($css_file)): ?>
        <link rel="stylesheet" href="<?php echo $css_file; ?>?v=<?php echo time(); ?>">
    <?php endif; ?>
</head>
<body>