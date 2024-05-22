function checkStatus(select) {
    if (select.value == 1) {
        alert('Окозание услуги в ожидании');
    }
    if(select.value == 2){
        alert('Услуга переведена в статус "В работе"');
    }
    if (select.value == 3) {
        alert('Услуга выполнена!');
    }
    if (select.value == 4) {
        alert('К сожаление услуга по ремонту не выполнена!');
    }

}