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

    @Output() status = new EventEmitter();

    press = false;

    constructor(private formService: FormService) {
    }

    ngOnInit(): void {
    }

    onClick() {

        const status = !this.press;

        this.formService.clickStatus = true;
        this.formService.onClick(this.label, status);

        this.status.emit(this.label);
    }

}
