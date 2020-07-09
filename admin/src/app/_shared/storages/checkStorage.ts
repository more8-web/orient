export function checkStorage() {
  if (localStorage.getItem("X-AUTH-TOKEN")) {
    return localStorage.getItem("X-AUTH-TOKEN");
  } else if (sessionStorage.getItem("X-AUTH-TOKEN")) {
    return sessionStorage.getItem("X-AUTH-TOKEN");
  }
}
