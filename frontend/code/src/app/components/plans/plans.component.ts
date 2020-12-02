import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

import { PlanService } from '../../services/plan.service';

@Component({
  selector: 'app-plans',
  templateUrl: './plans.component.html',
  styleUrls: ['./plans.component.css']
})
export class PlansComponent implements OnInit {

  public plan_data: any;

  constructor(private router: Router, private planService: PlanService) { }

  ngOnInit(): void {
    this.getPlanData();
  }

  getPlanData(): void{
    this.planService.getAll()
      .subscribe( 
        (response) => this.plan_data = response.data, 
        () => {
          this.plan_data = null;
          this.router.navigateByUrl('refresh').then(() => {
            this.router.navigateByUrl(`erro`)
          });
        }

      );
  }
}
