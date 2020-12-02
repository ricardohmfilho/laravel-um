import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';

import { CustomerService } from '../../../services/customer.service';

import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { StateService } from 'src/app/services/state.service';
import { CityService } from 'src/app/services/city.service';

import { NotificationService } from '../../../services/notifications.service';

@Component({
  selector: 'app-form',
  templateUrl: './form.component.html',
  styleUrls: ['./form.component.css']
})
export class FormComponent implements OnInit {

  public postData: FormGroup;
  public customer_data: any;
  public state_data: any;
  public city_data: any;
  public is_new: boolean;

  constructor(private router: Router,
      private fb: FormBuilder, 
      private customerService: CustomerService,
      private stateService: StateService,
      private cityService: CityService,
      private activatedRoute: ActivatedRoute,
      private notificationService: NotificationService
  ) { }

  ngOnInit(): void {

    console.log(this.activatedRoute.snapshot);

    if(this.activatedRoute.snapshot.params['id']){
      this.is_new = false;
    } else{
      this.is_new = true;
    }

    this.stateService.getAll().subscribe(response => this.state_data = response.data);
    this.cityService.getAll().subscribe(response => this.city_data = response.data);

    this.loadFormData();

    this.postData = this.fb.group({
      name: new FormControl(null, {validators: [Validators.required], updateOn: 'change'}),
      email: new FormControl(null, {validators: [Validators.required], updateOn: 'change'}),
      phone_number: new FormControl(null),
      born_at: new FormControl(null),
      state_id: new FormControl(null),
      city_id: new FormControl(null)
    });
  }

  get form() { return this.postData.controls; } 

  loadFormData(){ 
    let id = this.activatedRoute.snapshot.params['id'];
    if(id > 0){
      this.customerService.getById(id)
        .subscribe(response => this.customer_data = response.data, 
                  () => this.customer_data = null, 
                  () => { this.postData.patchValue(this.customer_data); }
        );
    }
  }

  onSubmit(){
    //console.log(this.postData.value);
    if(this.customer_data != undefined){ // EDIT
      this.customerService.put(this.customer_data.id, this.postData.value)
      .subscribe(
        (response) => {
          console.log(response)
          this.showNotification(response.message, 0)
        },
        (error) => {
          console.log(error);
          this.showNotification(error.error.message, 2)
        },
      )
    } else { // NEW
      this.customerService.post(this.postData.value)
      .subscribe(
        (response) => {
          console.log(response)
          this.showNotification(response.message, 0)
        },
        (error) => {
          console.log(error);
          this.showNotification(error.error.message, 2)
        },
        () => {
          setTimeout(() =>{
            this.router.navigate(['clientes'])
          }, 2000);
        }
      )
    }
  }

  showNotification(message: string, type: number) {
    this.notificationService.sendMessage({message: message, type: type});
  }

}
