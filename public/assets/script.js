// Funções de Validação
function isFieldEmpty(field, message, event) {
  if (field.trim() === '') {
      alert(message);
      event.pereventDefault();
      return true;
  }
  return false;
}

function isValidRegex(value, regex, message, event) {
  if (!regex.test(value)) {
      alert(message);
      event.preventDefault();
      return false;
  }
  return true;
}
//
function showError(id, message) {
  const errorElement = document.getElementById(id);
  if (errorElement) {
    errorElement.textContent = message;
    errorElement.style.display = 'block';
  } else {
    console.warn(`Elemento com ID ${id} não encontrado.`);
  }
}

function hideErrors() {
  const errors = document.querySelectorAll('.error-message');
  errors.forEach(error => (error.style.display = 'none'));
}

function validarFormularioCadastro(event) {
  hideErrors();

  const fields = {
    nome: {
      value: document.getElementById('nome').value.trim(),
      message: 'Por favor, insira seu nome.',
      minLen: 2,
      errorId: 'nome-erro',
    },
    cpf: {
      value: document.getElementById('cpf').value.trim(),
      message: 'Por favor, insira um CPF válido com 11 dígitos.',
      regex: /^\d{11}$/, // Somente números, exatamente 11 dígitos
      errorId: 'cpf-erro',
    },
    creci: {
      value: document.getElementById('creci').value.trim(),
      message: 'O CRECI deve ter entre 2 e 6 caracteres.',
      regex: /^[A-Za-z0-9]{2,6}$/, // Alfanumérico, entre 2 e 6 caracteres
      errorId: 'creci-erro',
    },
  };

  let isValid = true;

  // Validações genéricas
  for (const fieldName in fields) {
    const field = fields[fieldName];
    const value = field.value;

    // Valida tamanho mínimo
    if (field.minLen && value.length < field.minLen) {
      showError(field.errorId, field.message);
      isValid = false;
      continue;
    }

    // Valida regex (se existir)
    if (field.regex && !field.regex.test(value)) {
      showError(field.errorId, field.message);
      isValid = false;
      continue;
    }
  }

  if (isValid) {
    document.getElementById('cadastro-corretor').submit();
  } else {
    event.preventDefault();
  }
}

document.getElementById('cadastro-corretor').addEventListener('submit', validarFormularioCadastro);


   // escolhi uma função reutilizavel para as validaçoes pensando na escalabilidade do projeto, por exemplo o site da imobiliaria tambem tem um formulario para compradores que poderia ser facilmente aplicado aqui


   
function editarCorretor(id, nome, cpf, creci) {
  document.getElementById('id').value = id;
  document.getElementById('nome').value = nome;
  document.getElementById('cpf').value = cpf;
  document.getElementById('creci').value = creci;
  document.getElementById('submit-button').textContent = 'Salvar';
}

window.onload = function () {
  const idField = document.getElementById('id').value;
  if (!idField) {
      document.getElementById('submit-button').textContent = 'Enviar';
  }
};
