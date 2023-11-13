// import { Chart } from "chart.js/auto";
import constants from "../constants";

const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

// chart element
const lastWeekChart = document.getElementById('lastWeekChart');
const lastSevenDaysChart = document.getElementById('lastSevenDay');
const periodChart = document.getElementById('Period');

// lay phan tu thong ke o slidebar
const statisticsElement = document.getElementById('Statistics');

const loading1 = $('.loading1');
const loading2 = $('.loading2');
const loading3 = $('.loading3');

// doanh thu
const revenueFish = document.getElementById('revenue-fish');
const revenueAccessories = document.getElementById('revenue-accessories');
const totalRevenue = document.getElementById('total-revenue');

// 3 bien luu 3 bieu do khi duoc ve ra
let lastWeekChartDraw;
let lastSevenDayChartDraw;
let periodChartDraw;

const dayOfWeek = [
  { day: 'Thứ 2' },
  { day: 'Thứ 3' },
  { day: 'Thứ 4' },
  { day: 'Thứ 5' },
  { day: 'Thứ 6' },
  { day: 'Thứ 7' },
  { day: 'Chủ nhật' },
];

let dataFish;
let dataAccessories;

// draw chart function
function drawChart(chartElement, time, dataFish, dataAccessories) {
  const ctx = chartElement.getContext('2d');
  const chart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: time.map(row => row.day),
      datasets: [
        {
          label: 'Cá',
          data: dataFish.map(row => row.total_quantity),
          backgroundColor: 'rgba(54, 162, 235, 0.8)',
          borderColor: 'rgb(54, 162, 235)',
          borderWidth: 2,
          borderRadius: 20,
          barThickness: 20
        },
        {
          label: 'Phụ kiện',
          data: dataAccessories.map(row => row.total_quantity),
          backgroundColor: 'rgba(76, 78, 231, 0.8)',
          borderColor: 'rgb(54, 162, 235)',
          borderWidth: 2,
          borderRadius: 20,
          barThickness: 20
        }
      ],
    },

    options: {
      scales: {
        y: {
          beginAtZero: true
        },
      },
      plugins: {
        legend: {
          labels: {
            font: {
              size: 16,
              style: 'italic',
            }
          }
        }
      },
      responsive: true,
      maintainAspectRatio: true,
      // aspectRatio: 2,
      height: 10,
      width: 200,
    }
  });
  return chart;
}

// chuyển đổi các kiểu thống kê

// 1 tuan truoc
const btnlastWeek = $('.btn-last-week-chart');
const lastWeekElement = $('.last-week-chart');

// 7 ngày qua
const btnlastSevenDay = $('.btn-last-seven-day-chart');
const lastSevenDayElement = $('.last-seven-day-chart');

// moc thoi gian
const btnPeriod = $('.btn-period-chart');
const periodElement = $('.period-chart');

// form chọn mốc thời gian
const formPeriod = $('.form-period');

async function fetchDataApi($endpointApi, options) {
  return await fetch($endpointApi, options)
    .then(response => response.json())
    .then(data => {
      // console.log(data);
      dataFish = data[0];
      dataAccessories = data[1];

      let totalRevenueFish = 0;
      let totalRevenueAccessories = 0;
      for (let i = 0; i < dataFish.length; i++) {
        totalRevenueFish += data[0][i].total_price;
        totalRevenueAccessories += data[1][i].total_price;
      }
      // toLocaleString('vi-VN') format 500000000 = 500.000.000;
      if (revenueFish && revenueAccessories && totalRevenue) {
        revenueFish.innerHTML = totalRevenueFish.toLocaleString('vi-VN');
        revenueAccessories.innerHTML = totalRevenueAccessories.toLocaleString('vi-VN');
        totalRevenue.innerHTML = (totalRevenueFish + totalRevenueAccessories).toLocaleString('vi-VN');
      }

      return data;
    });
}
function fetchApiDataLastWeek() {
  fetchDataApi(constants.LAST_WEEK).then();

  setTimeout(() => {
    if (lastWeekChartDraw) {
      lastWeekChartDraw.destroy();
    }
    if (lastWeekChart) {
      lastWeekChartDraw = drawChart(lastWeekChart, dayOfWeek, dataFish, dataAccessories);
      if (lastSevenDayChartDraw) {
        lastSevenDayChartDraw.destroy();
      }
      if (periodChartDraw) {
        periodChartDraw.destroy();
      }
    }
    if(loading1) {
      loading1.classList.add('hidden');
    }
  }, 500);
}

// lan dau load trang
(function() {
  if (lastWeekChart) {
    fetchApiDataLastWeek();
  }
})();

// click thong ke o slidebar
statisticsElement.addEventListener('click', fetchApiDataLastWeek);

if(btnlastWeek) {
  btnlastWeek.addEventListener('click', function() {
    // những xử lí của biểu đồ này
    lastWeekElement.classList.remove('hidden');
    lastSevenDayElement.classList.add('hidden');

    btnlastWeek.classList.add('bg-blue-100');
    btnlastWeek.classList.add('text-white');

    fetchApiDataLastWeek();

    // những xử lí của các biểu đồ còn lại
    periodElement.classList.add('hidden');
    formPeriod.classList.add('hidden');
    loading2.classList.remove('hidden');
    loading3.classList.remove('hidden');

    btnlastSevenDay.classList.remove('bg-blue-100');
    btnlastSevenDay.classList.remove('text-white');

    btnPeriod.classList.remove('bg-blue-100');
    btnPeriod.classList.remove('text-white');

    // khi chuyển biểu đồ đặt lại mốc thời gian ban đầu (chưa chọn)
    startDateInput.value = '';
    endDateInput.value = '';
    endDateSelected = false;
    if(periodChartDraw) {
      periodChartDraw.destroy();
    }
  });
}

// // Thống kê 7 ngày qua
const dayOfWeekNames = ['Chủ nhật', 'Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7'];
// lấy thời gian hiện tại
const currentDate = new Date();
// lấy số thứ tự ngày trong tuần
const currentDayOfWeek = currentDate.getDay();
// lấy số thứ tự của ngày trong tuần của thời gian hiện tại (0-6 : Chủ nhật - thứ 7)
const lastWeekStart = new Date(currentDate);

lastWeekStart.setDate(currentDate.getDate() - currentDayOfWeek - 7);

const dayOfMonth = [];
for(let i = 0; i <= 6; i++) {
  const dayOfWeek = (currentDayOfWeek + i) % 7;
  const date = new Date(lastWeekStart);
  date.setDate(date.getDate() + i);
  if (i === 6) {
    dayOfWeekNames[dayOfWeek] = 'Hôm qua';
  }
  const dayOfMonthName = dayOfWeekNames[dayOfWeek];
  dayOfMonth.push({ day: dayOfMonthName });
}
if(btnlastSevenDay) {
  btnlastSevenDay.addEventListener('click', function() {
    // những xử lí của biểu đồ này
    lastSevenDayElement.classList.remove('hidden');
    lastWeekElement.classList.add('hidden');

    btnlastSevenDay.classList.add('bg-blue-100');
    btnlastSevenDay.classList.add('text-white');

    fetchDataApi(constants.LAST_SEVEN_DAYS);

    // fake delay loading
    setTimeout(() => {
      if (lastSevenDayChartDraw) {
        lastSevenDayChartDraw.destroy();
      }
      if (lastSevenDaysChart) {
        lastSevenDayChartDraw = drawChart(lastSevenDaysChart, dayOfMonth, dataFish, dataAccessories);
        if (lastWeekChartDraw) {
          lastWeekChartDraw.destroy();
        }
        if (periodChartDraw) {
          periodChartDraw.destroy();
        }
      }
      loading2.classList.add('hidden');
    }, 500);

    // những xử lí của các biểu đồ còn lại
    periodElement.classList.add('hidden');
    formPeriod.classList.add('hidden');
    loading1.classList.remove('hidden');
    loading3.classList.remove('hidden');
    startDateInput.value = '';
    endDateInput.value = '';
    endDateSelected = false;

    btnlastWeek.classList.remove('bg-blue-100');
    btnlastWeek.classList.remove('text-white');

    btnPeriod.classList.remove('bg-blue-100');
    btnPeriod.classList.remove('text-white');
  });
}


// thống kê theo mốc thời gian
const startDateInput = document.getElementById('start-date');
const endDateInput = document.getElementById('end-date');

function getDaysInRange(startDate, endDate) {
  const dateArray = [];
  // Lặp qua các ngày từ ngày bắt đầu đến ngày kết thúc
  let current = startDate;
  while (current <= endDate) {
    // const dayOfWeekIndex = current.getDay();
    // const dayOfWeek = daysOfWeek[dayOfWeekIndex];

    // Định dạng ngày thành ngày chữ
    // const dayText = dayOfWeek.day;
    const day = `${current.getDate()}/${current.getMonth() + 1}/${current.getFullYear()}`;

    // Thêm vào mảng ngày
    dateArray.push({ day: day });

    // Tăng ngày hiện tại thêm 1 ngày
    current.setDate(current.getDate() + 1);
  }
  return dateArray;
}

const notifyInvalidDate = document.getElementById('date-invalid');
function updateResult(data) {
  const dataFish = data[0];
  const dataAccessories = data[1];
  if (startDateInput.value > endDateInput.value) {
    notifyInvalidDate.classList.remove('hidden');
    startDateInput.value = '';
    if (periodChartDraw) {
      periodChartDraw.destroy();
      loading3.classList.remove('hidden');
    }

    setTimeout(() => {
      notifyInvalidDate.classList.add('hidden');
    }, 3000);
  } else {
    if (periodChartDraw) {
      periodChartDraw.destroy();
      loading3.classList.remove('hidden');
    }
    const startDate = new Date(startDateInput.value);
    const endDate = new Date(endDateInput.value);
    const days = getDaysInRange(startDate, endDate);
    periodChartDraw = drawChart(periodChart, days, dataFish, dataAccessories);
    loading3.classList.add('hidden');
  }
}

function updateData() {
  const dataDate = {
    start_date: startDateInput.value,
    end_date: endDateInput.value
  }
  // token dinh nghia trong the meta phan head layout admin
  const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  const options = {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': token,
    },
    body: JSON.stringify(dataDate)
  }
  return fetchDataApi(constants.PERIOD, options);
}

// nếu chưa chon ngày kết thúc thì chọn ngày bắt đầu chưa cho render chart'
let startDateSelected = false;
let endDateSelected = false;
if(startDateInput) {
  startDateInput.addEventListener('change', () => {
    startDateSelected = true;
    if(endDateSelected) {
      updateData()
        .then(data => {
          updateResult(data);
        });
    }
  });
}
if(endDateInput) {
  endDateInput.addEventListener('change', () => {
    endDateSelected = true;
    if (startDateSelected) {
      updateData()
        .then(data => {
          updateResult(data);
        });
    }
  });
}

if(btnPeriod) {
  btnPeriod.addEventListener('click', function() {
    periodElement.classList.remove('hidden');
    formPeriod.classList.remove('hidden');
    lastWeekElement.classList.add('hidden');
    lastSevenDayElement.classList.add('hidden');

    btnPeriod.classList.add('bg-blue-100');
    btnPeriod.classList.add('text-white');

    // reset = 0
    revenueFish.innerHTML = 0;
    revenueAccessories.innerHTML = 0;
    totalRevenue.innerHTML = 0;

    if (lastWeekChartDraw) {
      lastWeekChartDraw.destroy();
    }
    if (lastSevenDayChartDraw) {
      lastSevenDayChartDraw.destroy();
    }

    loading1.classList.remove('hidden');
    loading2.classList.remove('hidden');

    btnlastWeek.classList.remove('bg-blue-100');
    btnlastWeek.classList.remove('text-white');

    btnlastSevenDay.classList.remove('bg-blue-100');
    btnlastSevenDay.classList.remove('text-white');
  });
}
