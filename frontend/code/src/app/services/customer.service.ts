import { Injectable } from '@angular/core';

import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { tap, filter } from 'rxjs/operators';

import { Customer } from '../models/Customer';

import { URL_API } from '../app.api';

@Injectable({
  providedIn: 'root'
})
export class CustomerService {

  Customer: Customer;

  constructor(private http: HttpClient) { }

  	getAll(): Observable<Customer>{
		return this.http.get<Customer>(URL_API + `/customers`).pipe(
			tap(response => { this.Customer = response }),
			tap(response => { console.log(response.data) })
		)
	}

	getById(id: number): Observable<Customer>{
		return this.http.get<Customer>(URL_API + `/customers/${id}`).pipe(
			tap(response => { this.Customer = response })
		)
	}

	post(Customer: Customer): Observable<any>{
		return this.http.post<any>(URL_API + `/customers`, Customer)
	}

	put(id: number, Customer: any): Observable<any>{
		return this.http.put<any>(URL_API + `/customers/${id}`,Customer)
  	}

	delete(id: number): Observable<any> {
		return this.http.delete(URL_API + `/customers/${id}`);
	}

}
