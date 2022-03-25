

let date = new Date();

const calendar = document.getElementById('calendar');
const dateElem = document.getElementById('date');

dateElem.textContent = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();

const moveLeftBtn = document.getElementById('moveLeft');
const moveRightBtn = document.getElementById('moveRight');

moveLeftBtn.addEventListener('click',moveLeft);
moveRightBtn.addEventListener('click',moveRight);

function moveLeft(){

    date = new Date(date.getFullYear(), date.getMonth() - 1, 1);
    dateElem.textContent = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();
    calendarSetup(date);

}

window.addEventListener('resize',size)
const body = document.getElementById('body');

const day = document.getElementById('day');

function size(e){

    if(body.offsetWidth < 580){

        day.querySelectorAll('th')[0].textContent = 'Пон';
        day.querySelectorAll('th')[1].textContent = 'Втр';
        day.querySelectorAll('th')[2].textContent = 'Сря';
        day.querySelectorAll('th')[3].textContent = 'Чет';
        day.querySelectorAll('th')[4].textContent = 'Пет';
        day.querySelectorAll('th')[5].textContent = 'Съб';
        day.querySelectorAll('th')[6].textContent = 'Нед';
    }else{
        day.querySelectorAll('th')[0].textContent = 'Понеделник';
        day.querySelectorAll('th')[1].textContent = 'Вторник';
        day.querySelectorAll('th')[2].textContent = 'Сряда';
        day.querySelectorAll('th')[3].textContent = 'Четвъртък';
        day.querySelectorAll('th')[4].textContent = 'Петък';
        day.querySelectorAll('th')[5].textContent = 'Събота';
        day.querySelectorAll('th')[6].textContent = 'Неделя';
    }
    
}

function moveRight(){

    date = new Date(date.getFullYear(), date.getMonth() + 1, 1);
    dateElem.textContent = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();;
    calendarSetup(date);

}

function calendarSetup(date){

    calendar.querySelectorAll(".monthDays").forEach(elem => {
        elem.remove()
    });

    let firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
    let lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);

    const firstDayInWeek = firstDay.getDay() === 0 ? 7 : firstDay.getDay();

    let prevMonthDays = (new Date(date.getFullYear(), date.getMonth(),0)).getDate() - firstDayInWeek + 2;

    console.log((new Date(date.getFullYear(), date.getMonth(),0)).getDate());

    const currentDate = new Date();

    if(date.getMonth() == currentDate.getMonth() && date.getFullYear() == currentDate.getFullYear()){
        dateElem.textContent = currentDate.getDate() + "-" + (currentDate.getMonth() + 1) + "-" + currentDate.getFullYear();
    }



    let dayCount = 1;

for(let i = firstDay.getDate(); i <= lastDay.getDate();){

    

    const trElem = document.createElement('tr');
    trElem.classList.add('monthDays');

    let counter = 1;
    for (let j = 1; j <= 7; j++) {


        const td = document.createElement('td');

        if(dayCount < firstDayInWeek){
            dayCount++;
            td.textContent = prevMonthDays++;
        }else if(i <= lastDay.getDate()){
            td.classList.add('days');
            td.textContent = i;
            if(i == currentDate.getDate() && date.getMonth() == currentDate.getMonth() && date.getFullYear() == currentDate.getFullYear()){
                td.classList.add('currentDate');
            }
            i++;
        }else{
            td.textContent = counter++;
        }
        

        trElem.append(td);

        calendar.append(trElem);

    }
}

}


calendarSetup(date);

