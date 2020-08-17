import { Component, EventEmitter, HostBinding, Input, OnInit, Output } from "@angular/core";
import { FormService } from "@app/services/form.service";


@Component({
    selector: "app-button",
    templateUrl: "./button.component.html",
    styleUrls: ["./button.component.css"]
})
export class ButtonComponent implements OnInit {

    @Input() @HostBinding("class") classes;
    @Input() label: any;

    press: boolean = false;

    constructor(private formService: FormService) {
    }

    ngOnInit(): void {
    }

    click() {

        let status = !this.press;
        let label = this.label;

        this.formService.clickStatus = true;
        this.formService.onClick(label, status);

    }

}
