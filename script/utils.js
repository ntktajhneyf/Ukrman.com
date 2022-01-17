var modalTexts = {
  wrongMainFields: 'Будь ласка, заповніть поля відмічені зірочкою',
  wrongDelivery: 'Будь ласка, заповніть поле доставки',
  submitError: 'Під час запиту сталася помилка,</br> передзвоніть до нас щоб зробити замовлення',
  thanksForBuy: "Дякуємо за покупку!</br> З вами зв'яжеться наш представник"
};

var checkoutTexts = {
  phonePlaceholder: '+38(0__) ___-__-__',
  phonePlaceholderAfter: '+38(0__)___-__-__',
  phoneInitial: '+380',
  defaultCity: 'Киев',
  defaultPayment: 'Наличными',
  defaultDelivery: 'delivery',
  defaultShipping: 'Доставка почтовыми службами'
};


//Object.assign polyfill
if (typeof Object.assign != 'function') {
  Object.assign = function(target, varArgs) { // .length of function is 2
    'use strict';
    if (target == null) { // TypeError if undefined or null
      throw new TypeError('Cannot convert undefined or null to object');
    }

    var to = Object(target);

    for (var index = 1; index < arguments.length; index++) {
      var nextSource = arguments[index];

      if (nextSource != null) { // Skip over if undefined or null
        for (var nextKey in nextSource) {
          // Avoid bugs when hasOwnProperty is shadowed
          if (Object.prototype.hasOwnProperty.call(nextSource, nextKey)) {
            to[nextKey] = nextSource[nextKey];
          }
        }
      }
    }
    return to;
  };
}


function getPhonePureValue(val) {
  var symbolIndex = val.indexOf('+');

  if (symbolIndex !== -1) return val.slice(symbolIndex);
  return val;
}

function isPhoneInputEmpty(val) {
  var PHONE_LENGTH = 13;
  var pureValue = getPhonePureValue(val);

  return val === checkoutTexts.phonePlaceholder
    || val === ''
    || pureValue.length !== PHONE_LENGTH;
}

function getShippingData(obj) {
  return {
    shippingAddress: obj.address,
    postOffice: obj.postOffice
  };
}

function getShipping(type) {
  var variants = {
    delivery: 'Нова пошта',
    pickup: 'Самовивіз'
  };

  return variants[type];
}

function getFormData(data) {
  return {
    name: (data.firstname || '') + (data.lastname || ''),
    phone: data.telephone || '',
    email: data.email || '',
    message: data.comment || '',
    shipping_type: getShipping(data.shippingType) || '',
    address: data.address || '',
    post_office: data.postOffice || ''
  }
}

function getEmptyKeys(params) {
  return Object.keys(params).filter(function(key){
    var value = params[key];

    if (key === "comment") return;
    if (key === "telephone") {
      return isPhoneInputEmpty(value);
    };

    if (typeof value === "string") {
      return !value.trim();
    }

    return !value
  });
};

function serialize(obj) {
  var str = [];
  for(var p in obj)
    if (obj.hasOwnProperty(p)) {
      str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
    }

  return str.join("&");
}

function isAppleIOS() {
  return /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
}