import axios from 'axios';

const port = 8099;

export function getURL(urlEnd) {
  let url;
  window.location.host.indexOf("localhost") > -1 
    ? (url =`http://localhost:${port}/printful/api.php?r=${urlEnd}`) 
    : (url = `/api.php?r=${urlEnd}`);
  return new Promise((resolve, reject) => {
    axios.create({withCredentials: true}).get(url).then((res) => {
    resolve(res.data);
    }).catch((err) => {
      console.log("____Rejected____");
      console.log(url);
      console.log(err);
      reject(err);
    })
  })
}
export function postURL(urlEnd, _data) {
  let _url;
  window.location.host.indexOf("localhost") > -1 
    ? (_url =`http://localhost:${port}/printful/api.php?r=${urlEnd}`) 
    : (_url = `/api.php?r=${urlEnd}`);
  console.log(_data);
  return new Promise((resolve,reject) => {
    axios.create({withCredentials: true}).post(_url, _data).then(res => {
      resolve(res.data);
    }).catch(err => {
      console.log("____Rejected____");
      console.log(_url);
      console.log(err);
      reject(err);
    })
  })
}