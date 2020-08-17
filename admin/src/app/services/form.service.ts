import { Injectable } from "@angular/core";
import { Observable } from "rxjs";

@Injectable({
    providedIn: "root"
})
export class FormService {
    private _dataObservable: Observable<object[]>;

    constructor() {
        this._dataObservable = new Observable<object[]>(subscriber => {
            subscriber.next(this.fieldData);
        });
    }

    clickStatus: boolean = false;

    fieldData = [];



    public status() {
        return new Observable(subscriber => {
            subscriber.next(this.clickStatus);
            subscriber.complete();
            subscriber.error(err => console.log(err));
        });
    }

    public onClick(label, value) {
        this.fieldData.push({label, value});
    }

    public fromClick() {
        return new Observable(subscriber => {
            subscriber.next(this.fieldData);
        });
    }

    public clear() {
        this.fieldData = [];
    }
}
