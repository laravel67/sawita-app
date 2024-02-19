document.getElementById('analysisForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const button = document.getElementById('startAnalysisBtn');
    const spinner = document.createElement('span');
    spinner.classList.add('spinner-border', 'spinner-border-sm');
    spinner.setAttribute('role', 'status');
    spinner.setAttribute('aria-hidden', 'true');
    button.innerText = '';
    button.appendChild(spinner);
    button.appendChild(document.createTextNode(' Loading...'));
    button.disabled = true;
    setTimeout(function() {
        button.disabled = false;
        button.style.display = 'none';
        event.target.submit();
    }, 3000);
});

