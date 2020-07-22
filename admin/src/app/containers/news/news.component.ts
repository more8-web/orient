import { Component, OnInit } from "@angular/core";
import { select, Store } from "@ngrx/store";

import { NewsList } from "@context/models";
import { newsActions, selectNewsList } from "@context/store";

@Component({
    selector: "app-news",
    templateUrl: "./news.component.html",
    styleUrls: ["./news.component.css"]
})
export class NewsComponent implements OnInit {

    newsList: NewsList;

    constructor(private store: Store) {
    }

    ngOnInit(): void {
        this.store.dispatch(newsActions.load());
        this.store.pipe(
            select(selectNewsList)
        ).subscribe(
            data => this.newsList = {...data}
        );
    }
}
