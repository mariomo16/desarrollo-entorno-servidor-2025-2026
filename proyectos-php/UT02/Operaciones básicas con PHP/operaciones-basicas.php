<html>
    <head>
        <title>Operaciones básicas</title>
    </head>
    <body>
        <h1>Ejemplo con operadores aritméticos</h1>
        <p><?="<b>Suma</b>: 1+1 = " . 1+1?></p>
        <p><?="<b>Resta</b>: 6-3 = " . 6-3?></p>
        <p><?="<b>Multiplicación</b>: 7*3*2 = " . 7*3*2?></p>
        <p><?="<b>División</b>: 5/4 = " . 5/4?></p>
        <p><?="<b>Módulo</b>: 5%4 = " . 5%4?></p>
        <p><?="<b>Potencia</b>: 2**9 = " . 2**9?></p>

        <h1>Ejemplo con operadores de comparación</h1>
        <p><?="<b>Igualdad de valor</b>: 6==6 = " . var_export(6==6, true)?></p>
        <p><?="<b>Igualdad de valor</b>: 6=='6' = " . var_export(6=='6', true)?></p>
        <p><?="<b>Igualdad de valor</b>: 6==7 = " . var_export(6==7, true)?></p>
        <p><?="<b>Desigualdad de valor</b>: 6!=6 = " . var_export(6!=6, true)?></p>
        <p><?="<b>Desigualdad de valor</b>: 6!='6' = " . var_export(6!='6', true)?></p>
        <p><?="<b>Desigualdad de valor</b>: 6!=7 = " . var_export(6!=7, true)?></p>
        <p><?="<b>Igualdad de valor y tipo</b>: 6===6 = " . var_export(6===6, true)?></p>
        <p><?="<b>Igualdad de valor y tipo</b>: 6==='6' = " . var_export(6==='6', true)?></p>
        <p><?="<b>Igualdad de valor y tipo</b>: 6===7 = " . var_export(6===7, true)?></p>
        <p><?="<b>Desigualdad de valor o tipo</b>: 6!==6 = " . var_export(6!==6, true)?></p>
        <p><?="<b>Desigualdad de valor o tipo</b>: 6!=='6' = " . var_export(6!=='6', true)?></p>
        <p><?="<b>Desigualdad de valor o tipo</b>: 6!==7 = " . var_export(6!==7, true)?></p>
        <p><?="<b>Mayor que</b>: 6>5 = " . var_export(6>5, true)?></p>
        <p><?="<b>Mayor que</b>: 6>'5' = " . var_export(6>'5', true)?></p>
        <p><?="<b>Mayor que</b>: 6>6 = " . var_export(6>6, true)?></p>
        <p><?="<b>Mayor o igual que</b>: 6>=5 = " . var_export(6>=5, true)?></p>
        <p><?="<b>Mayor o igual que</b>: 6>='5' = " . var_export(6>='5', true)?></p>
        <p><?="<b>Mayor o igual que</b>: 6>=6 = " . var_export(6>=6, true)?></p>
        <p><?="<b>Mayor o igual que</b>: 6>=7 = " . var_export(6>=7, true)?></p>
        <p><?="<b>Menor que</b>: 5<6 = " . var_export(5<6, true)?></p>
        <p><?="<b>Menor que</b>: '5'<6 = " . var_export('5'<6, true)?></p>
        <p><?="<b>Menor que</b>: 6<6 = " . var_export(6<6, true)?></p>
        <p><?="<b>Menor o igual que</b>: 5<=6 = " . var_export(5<=6, true)?></p>
        <p><?="<b>Menor o igual que</b>: '5'<=6 = " . var_export('5'<=6, true)?></p>
        <p><?="<b>Menor o igual que</b>: 6<=6 = " . var_export(6<=6, true)?></p>
        <p><?="<b>Menor o igual que</b>: 7<=6 = " . var_export(7<=6, true)?></p>

        <h1>Ejemplo con operadores lógicos</h1>
        <p><?="<b>AND</b>: true && true = " . var_export(true && true, true)?></p>
        <p><?="<b>AND</b>: true && false = " . var_export(true && false, true)?></p>
        <p><?="<b>OR</b>: true || true = " . var_export(true || true, true)?></p>
        <p><?="<b>OR</b>: true || false = " . var_export(true || false, true)?></p>
        <p><?="<b>OR</b>: false || false = " . var_export(false || false, true)?></p>
        <p><?="<b>NOT</b>: !true && true = " . var_export(!true && true, true)?></p>
        <p><?="<b>NOT</b>: !false && true = " . var_export(!false && true, true)?></p>
    </body>
</html>