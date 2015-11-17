function gerarCalendario(y) {
	if(y!="atual"){
		hoje = new Date(y,0);
	}else{
		hoje = new Date();
	}	
	dia = hoje.getDate();
	mes = hoje.getMonth();
	ano = hoje.getFullYear();
	nomemes = ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'];
	inicio = new Date(ano,mes,1);
	letrasSemana = ['D','S','T','Q','Q','S','S'];
	a = 0;
	bi = bissexto(ano) ? 29 : 28;
	diasmes = [31,bi,31,30,31,30,31,31,30,31,30,31];
	
	mesmostrado = mes;
	mesanterior = mes-1;
	if(mesanterior<0)mesanterior=11;
	proximomes = mes+1;
	if(proximomes>11)mesanterior=0;
	
	function bissexto(year) {
		if (year % 4 == 0) // regra básica
			return true; // se o ano é bissexto
			/* else */ // neste caso o else não é necessario
			return false; // se o ano não é bissexto
	}
	
	t = '<div id="corpo">';
	t += '<div>' + nomemes[mesmostrado] + ', ' + ano + '</div>';
	t += '<div><table width="100%" border="0">';
	t += '<tr>';
	for(i=0; i<letrasSemana.length; i++) {
		t += '<td><div align="center">' + letrasSemana[i] + '</div></td>';
	}
	t += '</tr>';
	t += '</table>';
	t += '</div>';
	t += '<div><table width="100%" border="0" class="calendario">';
	t += '<tr>';
	if (inicio.getDay() == 0) {
		increase = 0;
	} else {
		increase = 1;
	}
	for(i=1; a<diasmes[mes]; i++) {
		if(i < inicio.getDay()+increase) {
			t += '<td class="sem-aula"><div align="center"></div></td>';
		} else {
			a++;
			if (a == dia && ano == new Date().getFullYear()) {
				t += '<td class="hoje"><div align="center"><b>' + a + '</b></div></td>';
			} else {
				data_auxiliar=new Date(ano,mes,a);
				//feriados
				confraternizacao=new Date(ano,0,1);
				tiradentes=new Date(ano,3,21);
				diadotrabalho=new Date(ano,4,1);
				independencia=new Date(ano,8,7);
				nossasenhora=new Date(ano,9,12);
				finados=new Date(ano,10,2);
				proclamacao=new Date(ano,10,15);
				natal=new Date(ano,11,25);

				sem_aula=data_auxiliar.getDay()==0 
				|| data_auxiliar.getDay()==6 
				|| data_auxiliar.getTime()=== confraternizacao.getTime()
				|| data_auxiliar.getTime()=== tiradentes.getTime()
				|| data_auxiliar.getTime()=== diadotrabalho.getTime()
				|| data_auxiliar.getTime()=== independencia.getTime()
				|| data_auxiliar.getTime()=== nossasenhora.getTime()
				|| data_auxiliar.getTime()=== finados.getTime()
				|| data_auxiliar.getTime()=== proclamacao.getTime()
				|| data_auxiliar.getTime()=== natal.getTime();

				if(sem_aula){
					t += '<td class="sem-aula"><div align="center">' + a + '</div></td>';
				}else{
					t += '<td><div align="center">' + a + '</div></td>';
				}
			}
		}
		if(i%7 == 0) {
			t += '</tr>';
			t += '<tr>';
		}
	}
	t += '</tr>';
	t += '</table>';
	t += '</div>';
	
	t += '<div><table width="100%" border="0">';
	t += '<tr>';
	t += '<td><div align="left" style="padding:0 0 0 8px;">&laquo; ' + nomemes[mesanterior].substr(0,3) +"/"+ ano+'</div></td>';
	t += '<td><div align="right" style="padding:0 8px 0 0;">' + nomemes[proximomes].substr(0,3) +"/"+ ano +' &raquo;</div></td>';
	t += '</tr>';
	t += '</table>';
	t += '</div>';
	t += '</div>';
	
	return t;
}
$( document ).ready(function() {
   // $("#accordion").accordion();
});