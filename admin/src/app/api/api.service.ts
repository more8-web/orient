import { Injectable } from '@angular/core';
import {HttpClient} from "@angular/common/http";

@Injectable({
  providedIn: 'root'
})
export class ApiService {
  private REST_API_SERVER = "http://api";

  constructor(private httpClient: HttpClient) {}

  protected post(url: string, body: any) {
    return this.httpClient.post(`${this.REST_API_SERVER}/${url}`, body);
  }

  protected get(url: string) {
    return this.httpClient.get(`${this.REST_API_SERVER}/${url}`);
  }
}
