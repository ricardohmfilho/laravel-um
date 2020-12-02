import { Injectable } from '@angular/core';

import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

import { URL_API } from '../app.api';

@Injectable({
  providedIn: 'root'
})
export class CityService {

  constructor(private http: HttpClient) { }

  getAll(): Observable<any> {
    return this.http.get(URL_API + `/cities`);
  }
}
