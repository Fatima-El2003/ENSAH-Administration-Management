function generateModuleFields() {
    var numModules = parseInt(document.getElementById('numModules').value);
    var moduleContainer = document.getElementById('moduleContainer');
    moduleContainer.innerHTML = '';
  
    for (var i = 1; i <= numModules; i++) {
        var moduleField = document.createElement('input');
        moduleField.type = 'text';
        moduleField.name = 'modules[]';//tableau des modules
        moduleField.placeholder = 'Module ' + i;
        moduleField.className = 'module-field';
        moduleContainer.appendChild(moduleField);
  
        var semestreField=document.createElement('input');
        semestreField.type = 'text';
        semestreField.name = 'semestres[]';
        semestreField.placeholder = 'semestre ' + i;
        semestreField.className = 'code-field';
        moduleContainer.appendChild(semestreField);
  
        var specialiteField = document.createElement('input');
        specialiteField.type = 'text';
        specialiteField.name = 'specialities[]';
        specialiteField.placeholder = 'specialite ' + i;
        specialiteField.className = 'module-field';
        moduleContainer.appendChild(specialiteField);
  
        var codeField=document.createElement('input');
        codeField.type = 'text';
        codeField.name = 'codes[]';
        codeField.placeholder = 'code ' + i;
        codeField.className = 'code-field';
        moduleContainer.appendChild(codeField);
  
        var nomDepartement = document.createElement('select');
        nomDepartement.name = 'nomDepartement[]';
  
        var option1 = document.createElement('option');
        option1.value = 'DMI';
        option1.text = 'DEPARTEMENT MATHEMATIQUES INFORMATIQUE ';
        nomDepartement.appendChild(option1);
  
        var option2 = document.createElement('option');
        option2.value = 'DCE';
        option2.text = 'DEPARTEMENT CIVIL ET ENERGITIQUE';
        nomDepartement.appendChild(option2);
    
        moduleContainer.appendChild(nomDepartement);
      }
  
  
    }
  