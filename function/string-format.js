function formatCurrency(amount){
    if(!amount){
        amount = 0;
    }
    let _currency = '';
    var formatter = new Intl.NumberFormat('vi-VN');
    amount = amount.toString().match(/\d+/);
    if(amount){
        _currency = formatter.format(amount);
    }
    return _currency;
}

function convertCurrencyToNumber(string, thousands_sep){
    let number = 0;
    if(!thousands_sep){
        thousands_sep = '.';
    }
    if(string){
        string = string.replace(/[^0-9.]/g, "");
        while(string.indexOf(thousands_sep) >= 0){
            string = string.replace(thousands_sep, '');
        }
        number = Number(string);
    }
    return number;
}

/**
* Format datetime string to vi-VN format
* @param {string} string Default of sql '2019-07-16 14:39:00'.
* @param {boolean} isShowTime default is false, if true return 14:39, 16/07/2019.
*/

function formatDateTime(string, isShowTime){
    let _dateString = '';
    if(string){
        let option = {
            year: 'numeric',
            month: '2-digit',
            day: '2-digit',
            hour12 : false
        };
        if(isShowTime === true){
            option.hour = '2-digit';
            option.minute = '2-digit';
        }
        _dateString = new Date(string).toLocaleDateString('vi-VN', option);
    }
    return _dateString;
}

$.fn.numberKeyUp = function(){
    $.each(this, function(index, item){
        item.addEventListener('keyup', function(){
            let _val = this.value;
            _valNew = convertCurrencyToNumber(_val);
            this.value = formatCurrency(_valNew);
        })
    });
}