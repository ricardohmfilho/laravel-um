import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';

import { CustomerService } from '../../../services/customer.service';
import { NotificationService } from '../../../services/notifications.service';

import { Customer } from '../../../models/Customer';

@Component({
  selector: 'app-table',
  templateUrl: './table.component.html',
  styleUrls: ['./table.component.css']
})
export class TableComponent implements OnInit {

  public customer_data: Customer;

  constructor(private router: Router, 
              private customerService: CustomerService,
              private notificationService: NotificationService,
              private activatedRoute: ActivatedRoute) { }

  ngOnInit(): void {
    this.getCustomerData();
  }

  showNotification(message: string, type: number) {
    this.notificationService.sendMessage({message: message, type: type});
  }

  getCustomerData(): void{
    this.customerService.getAll()
      .subscribe( 
        (response) => this.customer_data = response.data, 
        () => {
          this.customer_data = null;
          this.router.navigateByUrl('refresh').then(() => {
            this.router.navigateByUrl(`erro`)
          });
        }
      );
  }

  deleteCustomer(id): void{
    this.customerService.delete(id)
      .subscribe(
        (response) => {
          console.log(response.message)
          this.showNotification(response.message, 0)
        },
        (error) => {
          console.log(error);
          this.showNotification(error.error.message, 2)
        },
        () => {
          setTimeout(() =>{
            this.router.navigateByUrl('refresh').then(() => {
              this.router.navigateByUrl(`clientes`)
            })
          }, 2000);
        }
      );
  }

}