// Fonction pour mettre à jour le montant en lettres
function updateAmountInWords(amount) {
  const amountInWords = formatAmountInWords(amount);
  document.getElementById('amount-in-words').textContent = amountInWords;
}

// Fonction pour convertir un nombre en mots (version améliorée)
function numberToWords(num) {
  const ones = ['', 'un', 'deux', 'trois', 'quatre', 'cinq', 'six', 'sept', 'huit', 'neuf'];
  const tens = ['', 'dix', 'vingt', 'trente', 'quarante', 'cinquante', 'soixante'];
  const teens = ['dix', 'onze', 'douze', 'treize', 'quatorze', 'quinze', 'seize'];

  if (num === 0) return 'zéro';

  let words = '';

  if (num >= 1000000) {
      words += numberToWords(Math.floor(num / 1000000)) + ' million ';
      num %= 1000000;
  }

  if (num >= 1000) {
      if (Math.floor(num / 1000) === 1) {
          words += 'mille ';
      } else {
          words += numberToWords(Math.floor(num / 1000)) + ' mille ';
      }
      num %= 1000;
  }

  if (num >= 100) {
      if (Math.floor(num / 100) === 1) {
          words += 'cent ';
      } else {
          words += ones[Math.floor(num / 100)] + ' cent ';
      }
      num %= 100;
  }

  if (num > 0) {
      if (num < 10) {
          words += ones[num] + ' ';
      } else if (num >= 11 && num <= 16) {
          words += teens[num - 10] + ' ';
      } else if (num === 10) {
          words += 'dix ';
      } else if (num >= 17 && num < 20) {
          words += 'dix-' + ones[num - 10] + ' ';
      } else if (num >= 20 && num < 70) {
          words += tens[Math.floor(num / 10)] + ' ';
          if (num % 10 > 0) {
              words += ones[num % 10] + ' ';
          }
      } else if (num >= 70 && num < 80) {
          words += 'soixante-' + teens[num - 70] + ' ';
      } else if (num >= 80 && num < 90) {
          words += 'quatre-vingt ';
          if (num % 10 > 0) {
              words += ones[num % 10] + ' ';
          }
      } else if (num >= 90 && num < 100) {
          words += 'quatre-vingt-' + teens[num - 90] + ' ';
      }
  }

  return words.trim();
}

// Formater le montant en lettres
function formatAmountInWords(amount) {
  let integerPart = Math.floor(amount);
  let decimalPart = Math.round((amount - integerPart) * 100);

  let words = numberToWords(integerPart) + ' Ariary';
  if (decimalPart > 0) {
      words += ' et ' + numberToWords(decimalPart) + ' centimes';
  }
  return words.charAt(0).toUpperCase() + words.slice(1);
}

// Fonction à exécuter dès que la page est chargée
window.onload = function() {
  var amountText = document.getElementById('total-amount').innerText;
  // Extraire le montant en supprimant les espaces, les € et les autres caractères non numériques
  var amountNumber = parseFloat(amountText.replace(/\s/g, '').replace(/[^\d.]/g, ''));
  updateAmountInWords(amountNumber);
};
